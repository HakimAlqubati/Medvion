from PIL import Image
import sys

def convert_to_webp(source, destination):
    try:
        img = Image.open(source)
        img.save(destination, "WEBP", quality=80)
        print(f"Successfully converted {source} to {destination}")
    except Exception as e:
        print(f"Error: {e}")
        sys.exit(1)

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Usage: python convert.py <source> <destination>")
        sys.exit(1)
    convert_to_webp(sys.argv[1], sys.argv[2])
