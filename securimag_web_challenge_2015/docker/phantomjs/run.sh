#!/bin/bash
set -e

while sleep 30; do /usr/local/bin/phantomjs /xss.js; done;
