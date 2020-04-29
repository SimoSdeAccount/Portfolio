<?php if($_SESSION["LoggedInBruger"] == null){header("Location: Nej.php");} ?>
<form method="POST" action="index.php">
    <table id="ProjektTable">
        <tr>
            <th class="ProjektTableHeaders">
                Projekt
            </th>
            <th class="ProjektTableHeaders">
                Beskrivelse
            </th>
            <th class="ProjektTableHeaders">
            </th>
        </tr>
        <tr class="ProjektTableDataRows">
            <td>
                Birger Bolcher
            </td>
            <td >
                Første projekt efter første hovedforløb.
            </td>
            <td >
                <input type="submit" name="downloadBirger" value="Download" />    
            </td>
        </tr>
        <tr class="ProjektTableDataRows">
            <td>
                ProjektDummy 01
            </td>
            <td>
                Et dummy eksempel for at fylde content.
            </td>
            <td>
                <input type="submit" name="downloadDummy1" value="Download" />
            </td>
        </tr>
        <tr class="ProjektTableDataRows">
            <td>
                ProjektDummy 02
            </td>
            <td>
                Endnu et dummy eksempel for at fylde content.
            </td>
            <td>
                <input type="submit" name="downloadDummy2" value="Download" />
            </td>
        </tr>
    </table>
</form>