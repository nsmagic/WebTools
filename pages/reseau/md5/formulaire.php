<FORM method=post action="resultat.php">
	<TABLE BORDER=0>
		
		<TR>
			<TD>Hash</TD>
			<TD>
			<INPUT type=text name="hash">
			</TD>
		</TR>

		<TR>
			<TD>Type de hash</TD>
			<TD>
			<SELECT name="typehash">
			<OPTION VALUE="md4">md4</OPTION>
			<OPTION VALUE="md5">md5</OPTION>
			<OPTION VALUE="sha1">sha1</OPTION>
			<OPTION VALUE="sha256">sha256</OPTION>
			<OPTION VALUE="sha384">sha384</OPTION>
			<OPTION VALUE="sha512">sha512</OPTION>
			<OPTION VALUE="ntlm">ntlm</OPTION>
			</SELECT>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2>
			<INPUT type="submit" value="Envoyer">
			</TD>
		</TR>
	</TABLE>
</FORM>