line=""
getField(){
	echo "$line" | cut -f${1}
}

echo "INSERT ALL"
while read line
do
SALARIO_id=$(getField 1)
TIPO=$(getField 2)
cat <<- EOF
into SALARIO
(SALARIO_id, TIPO)
values
($SALARIO_id, '$TIPO')
EOF
done
echo "SELECT 1 from DUAL;"
