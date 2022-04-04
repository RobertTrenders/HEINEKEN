function onlyNumber(e, input, length) {

    var ASCIICode = (e.which) ? e.which : e.keyCode;

    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
        return false;
    }

    if (input.value.length >= length) {
        return false;
    }

    return true;
}
