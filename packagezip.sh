#!/bin/bash

echo "Removing old build folder and zip if present"
if test -d build/share-classicly; then
	rm -rf build/share-classicly
fi
if test -f build/share-classicly.zip; then
	rm build/share-classicly.zip
fi

echo "Copying files to build folder"
if [ ! -d build ]; then
	mkdir build
fi

mkdir build/share-classicly
cp -p *.php *.txt *.md LICENSE build/share-classicly

echo "Building share-classicly.zip"
cd build && zip -r share-classicly.zip share-classicly

