#!/bin/bash

GET_CERTIFICATE()
{
  openssl s_client -showcerts -connect "${1}:${2}" </dev/null 2>/dev/null | sed -n '/-----BEGIN CERTIFICATE-----/,/-----END CERTIFICATE-----/p'  > "/usr/local/share/ca-certificates/${1}.crt"
}

if [ -z "${1}" ]
then
  echo "Parameter 1 is empty"
else
  if [ -z "${2}" ]
  then
    echo "Parameter 2 is empty"
    GET_CERTIFICATE ${1} 443
  else
    GET_CERTIFICATE ${1} ${2}
  fi
fi


update-ca-certificates
