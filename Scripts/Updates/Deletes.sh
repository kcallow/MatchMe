for update in *;
do
	sed 's/UPDATE/DELETE FROM/g' $update | grep -v set > ../Delete/${update/UPDATE/DELELE}
done
