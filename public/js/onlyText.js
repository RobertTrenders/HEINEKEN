function onlyText(e) {

    var ASCIICode = (e.which) ? e.which : e.keyCode;

    if (ASCIICode == 32 || ASCIICode == 44 || ASCIICode == 46 || ASCIICode == 241 || ASCIICode == 209 ||
            (ASCIICode > 64 && ASCIICode < 91) || (ASCIICode > 96 && ASCIICode < 123) ||
            ASCIICode == 225 || ASCIICode == 233 || ASCIICode == 237 || ASCIICode == 243 || ASCIICode == 250 ||
            ASCIICode == 193 || ASCIICode == 201 || ASCIICode == 205 || ASCIICode == 211 || ASCIICode == 218) {
        return true;
    }

    return false;
}