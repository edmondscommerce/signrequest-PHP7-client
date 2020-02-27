#!/usr/bin/env bash
readonly DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd $DIR
set -Ee
set -u
set -o pipefail
IFS=$'\n\t'
echo "
===========================================
$(hostname) $0 $@
===========================================
"
readonly clientDir="src/Client"

echo "Generating"
if [[ -d $clientDir ]]; then
  rm -rf $clientDir
fi
php ./bin/jane-openapi generate --config-file=janeconfig.php
echo "done"

echo "Fixing comments:"
find $clientDir -type f -name "*.php" -exec sed -i 's/\*\*{{ subdomain }}\*\*/{{ subdomain }}/g' {} \;

echo "Fixing types:"
find $clientDir -type f -name "*.php" -exec sed -i 's/, \$format = null/, string \$format = null/g' {} \;

echo "CS Fixer"
./bin/qa -t f
echo "done"

echo "Client Regenerated however you might want to run manual inspections to fully polish the generated code"
