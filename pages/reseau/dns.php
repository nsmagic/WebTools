<?php
/* Demande tous ("ANY") les enregistrements pour php.net, 
   puis crée les tableaus $authns et $addtl
   contenant une liste des noms de serveurs, et tous
   les enregistrements qui vont avec
   */
$result = dns_get_record("nsmagic.ch", DNS_ANY, $authns, $addtl);
echo "Result = ";
print_r($result);
echo "Auth NS = ";
print_r($authns);
echo "Additional = ";
print_r($addtl);
?>