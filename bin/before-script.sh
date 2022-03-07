#!/bin/bash

set -e

# Set up general paths.
export OG_DIR="$(pwd)"

# Set up paths for our plugin, theme. Add any additional custom themes/plugins here.
export PLUGIN_DIR="${OG_DIR}/plugins/${PLUGIN_SLUG}"
export THEME_DIR="${OG_DIR}/themes/${THEME_SLUG}"

# Install node dependencies.
echo "Installing dependencies for build ..."

ALL_BUILD_DIRS=(
	"$PLUGIN_DIR"
	"$THEME_DIR"
)

for DIR in "${ALL_BUILD_DIRS[@]}"; do
	cd $DIR
	npm ci
done;

cd $OG_DIR
