#!/usr/bin/env bash

cd "$( dirname "${BASH_SOURCE[0]}" )" || exit

source .common

echo_info "Install DRUPAL"

cd "${APP_DIR}" || exit

${DRUSH} si minimal --existing-config -y || error

# Enforce cache rebuild.
${DRUSH} cr

echo_info "Install DRUPAL Finished"
