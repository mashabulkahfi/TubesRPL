<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <form method="post" action="simpan.php">
            <table>
                <tr><td>ALAMAT PENGIRIMAN</td><td><input type="text" name="alamat"></td></tr>
                <tr><td>METODE PEMBAYARAN</td><td>
                        <input type="radio" name="metode" value="Debit">Debit
                        <input type="radio" name="metode" value="Kredit">Kredit
                    </td></tr>
                <tr><td>UPLOAD BUKTI PEMBAYARAN</td><td>
        				<td><input type="file" name="foto">
        			</td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan">SUBMIT</button></td></tr>
            </table>
        </form>
    </body>
</html>
