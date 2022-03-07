#!/bin/bash

set -e

echo "Building $1 ..."
cd $1
npm run build
