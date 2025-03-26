#!/bin/bash

if [ -z "${PARAM_1}" ]; then
  PARAM_1="PARAM_1"
fi

if [ -z "${PARAM_2}" ]; then
  PARAM_2="PARAM_2"
fi

if [ -z "${FILE_NAME}" ]; then
  FILE_NAME=0
fi

while true
do
	# Echo current date to file
	printf "%s %s %s fichier batch\r\n" "${PARAM_1}" "${PARAM_2}" "$(date)" >> "/tmp/batch.${FILE_NAME}.txt"
	# Echo current date to stdout
	printf "%s %s %s log out\r\n" "${PARAM_1}" "${PARAM_2}" "$(date)"
	# Echo 'error!' to stderr
	printf "%s %s %s log err\r\n" "${PARAM_1}" "${PARAM_2}" "$(date)" >&2
	sleep 1
done