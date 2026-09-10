/**
 * Shared Yemen Phone Validation and Input Handler
 * Platform: Medvion
 * Used across Registration, Contact, and any future phone inputs.
 */
(function (global) {
    'use strict';

    const REGEX = /^(70|71|73|77|78)\d{7}$/;

    const CARRIERS = {
        '77': { name: 'يمن موبايل', cls: 'carrier-ym' },
        '78': { name: 'يمن موبايل', cls: 'carrier-ym' },
        '73': { name: 'يو YOU',     cls: 'carrier-you' },
        '71': { name: 'سبأفون',     cls: 'carrier-saba' },
        '70': { name: 'واي Y',      cls: 'carrier-y' },
    };

    const ARABIC_DIGITS = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];

    const YemenPhone = {
        REGEX: REGEX,
        CARRIERS: CARRIERS,

        /**
         * Clean raw input into normalized 9 digits (or less while typing).
         * Converts Eastern Arabic digits, removes country code +967 / 00967,
         * strips leading 0, strips non-digits, and caps length to 9.
         */
        clean: function (val) {
            if (val === null || val === undefined) return '';
            let str = String(val).trim();

            // Convert Eastern Arabic numerals (٠-٩)
            str = str.replace(/[٠-٩]/g, function (d) {
                return ARABIC_DIGITS.indexOf(d);
            });

            // Strip country code if pasted (+967, 00967, 967)
            str = str.replace(/^(\+?967|00967)/, '');

            // Strip leading zeros
            if (str.startsWith('0') && str.length > 1) {
                str = str.replace(/^0+/, '');
            }

            // Keep digits only
            str = str.replace(/\D/g, '');

            // Limit to 9 digits
            return str.slice(0, 9);
        },

        /**
         * Check if value is a valid 9-digit Yemeni mobile number.
         */
        isValid: function (val) {
            return REGEX.test(this.clean(val));
        },

        /**
         * Detect telecom carrier by 2-digit prefix (77, 78, 73, 71, 70).
         */
        getCarrier: function (val) {
            const cleanVal = this.clean(val);
            const prefix = cleanVal.slice(0, 2);
            return CARRIERS[prefix] || null;
        },

        /**
         * Bind full interactive handling to input element.
         * @param {Object} opts
         *   - input: HTMLInputElement or ID
         *   - wrapper: HTMLElement or ID (optional)
         *   - carrierBadge: HTMLElement or ID (optional)
         *   - counter: HTMLElement or ID (optional)
         *   - statusIcon: HTMLElement or ID (optional)
         *   - errorText: HTMLElement or ID (optional)
         *   - onValidate: function(isValid, carrier, cleanVal) (optional callback)
         */
        attach: function (opts) {
            if (!opts) return;

            const inputEl = typeof opts.input === 'string' ? document.getElementById(opts.input) : opts.input;
            if (!inputEl) return;

            const wrapperEl     = typeof opts.wrapper === 'string' ? document.getElementById(opts.wrapper) : opts.wrapper;
            const badgeEl       = typeof opts.carrierBadge === 'string' ? document.getElementById(opts.carrierBadge) : opts.carrierBadge;
            const counterEl     = typeof opts.counter === 'string' ? document.getElementById(opts.counter) : opts.counter;
            const statusIconEl  = typeof opts.statusIcon === 'string' ? document.getElementById(opts.statusIcon) : opts.statusIcon;
            const errorEl       = typeof opts.errorText === 'string' ? document.getElementById(opts.errorText) : opts.errorText;

            const self = this;

            function updateUI() {
                const raw = inputEl.value;
                const cleanVal = self.clean(raw);
                if (inputEl.value !== cleanVal) {
                    inputEl.value = cleanVal;
                }

                // Update counter
                if (counterEl) {
                    counterEl.textContent = cleanVal.length + '/9';
                    if (cleanVal.length === 9) {
                        counterEl.classList.add('text-teal-400', 'text-teal-600');
                        counterEl.classList.remove('text-gray-400', 'text-white/40');
                    } else {
                        counterEl.classList.remove('text-teal-400', 'text-teal-600');
                        counterEl.classList.add('text-gray-400');
                    }
                }

                const carrier = self.getCarrier(cleanVal);

                // Update carrier badge
                if (badgeEl) {
                    if (carrier) {
                        badgeEl.textContent = carrier.name;
                        badgeEl.className = 'carrier-badge ' + carrier.cls;
                        badgeEl.classList.remove('hidden');
                        badgeEl.style.display = 'inline-flex';
                    } else {
                        badgeEl.classList.add('hidden');
                        badgeEl.style.display = 'none';
                    }
                }

                // Check states
                if (cleanVal.length === 0) {
                    if (wrapperEl) {
                        wrapperEl.classList.remove('is-error', 'is-valid');
                    }
                    if (statusIconEl) statusIconEl.innerHTML = '';
                    if (errorEl) {
                        errorEl.classList.remove('show');
                        errorEl.textContent = '';
                    }
                    if (typeof opts.onValidate === 'function') {
                        opts.onValidate(false, null, cleanVal);
                    }
                    return;
                }

                // Invalid prefix when 2+ digits entered
                if (cleanVal.length >= 2 && !carrier) {
                    if (wrapperEl) {
                        wrapperEl.classList.add('is-error');
                        wrapperEl.classList.remove('is-valid');
                    }
                    if (statusIconEl) {
                        statusIconEl.innerHTML = '<svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>';
                    }
                    if (errorEl) {
                        errorEl.textContent = 'يجب أن يبدأ الرقم بـ 77 أو 78 أو 73 أو 71 أو 70';
                        errorEl.classList.add('show');
                    }
                    if (typeof opts.onValidate === 'function') {
                        opts.onValidate(false, null, cleanVal);
                    }
                    return;
                }

                // Valid complete 9 digits
                if (self.isValid(cleanVal)) {
                    if (wrapperEl) {
                        wrapperEl.classList.add('is-valid');
                        wrapperEl.classList.remove('is-error');
                    }
                    if (statusIconEl) {
                        statusIconEl.innerHTML = '<svg class="w-5 h-5 text-teal-500 text-teal-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>';
                    }
                    if (errorEl) {
                        errorEl.classList.remove('show');
                        errorEl.textContent = '';
                    }
                    if (typeof opts.onValidate === 'function') {
                        opts.onValidate(true, carrier, cleanVal);
                    }
                } else {
                    // In progress
                    if (wrapperEl) {
                        wrapperEl.classList.remove('is-valid', 'is-error');
                    }
                    if (statusIconEl) statusIconEl.innerHTML = '';
                    if (errorEl) {
                        errorEl.classList.remove('show');
                        errorEl.textContent = '';
                    }
                    if (typeof opts.onValidate === 'function') {
                        opts.onValidate(false, carrier, cleanVal);
                    }
                }
            }

            inputEl.addEventListener('input', updateUI);
            inputEl.addEventListener('paste', function () {
                setTimeout(updateUI, 0);
            });

            inputEl.addEventListener('blur', function () {
                const cleanVal = self.clean(inputEl.value);
                if (cleanVal.length > 0 && !self.isValid(cleanVal)) {
                    if (wrapperEl) {
                        wrapperEl.classList.add('is-error');
                        wrapperEl.classList.remove('is-valid');
                    }
                    if (errorEl) {
                        errorEl.textContent = 'يجب أن يكون رقم جوال يمني مكون من 9 أرقام يبدأ بـ (77, 73, 78, 71, 70).';
                        errorEl.classList.add('show');
                    }
                }
            });

            if (inputEl.value) {
                updateUI();
            }

            return {
                update: updateUI,
                isValid: function () {
                    return self.isValid(inputEl.value);
                },
                getValue: function () {
                    return self.clean(inputEl.value);
                }
            };
        }
    };

    global.YemenPhone = YemenPhone;
})(typeof window !== 'undefined' ? window : this);
