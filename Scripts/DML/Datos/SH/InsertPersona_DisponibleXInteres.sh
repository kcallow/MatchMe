line=""
getField(){
	echo "$line" | cut -f${1}
}

echo "INSERT ALL"
while read line
do
USERNAME=$(getField 1)
INTERES_ID=$(getField 2)
cat <<- EOF
into PERSONA_DISPONIBLEXINTERES
(USERNAME, INTERES_ID)
values
('$USERNAME', $INTERES_ID)
EOF
done
echo "SELECT 1 from DUAL;"
