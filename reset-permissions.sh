#!/bin/sh

# Give all directories 775 permissions
chmod 775 $(find /srv/http/te -type d)
# Give all files 664 permissions
chmod 664 $(find /srv/http/te -type f)

# Change ownership of all files and directories for web developement
chown root:srv $(find /srv/http/te)

# Reset executable permissions of this script
chmod 775 /srv/http/te/reset-permissions.sh
