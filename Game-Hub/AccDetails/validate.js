function validateForm() {
    const accountNumber = document.getElementById('account_number').value;
    const cvv = document.getElementById('cvv').value;

    if (!/^\d{16}$/.test(accountNumber)) {
        alert("Account number must be 16 digits.");
        return false;
    }
    if (!/^\d{3}$/.test(cvv)) {
        alert("CVV must be 3 digits.");
        return false;
    }
    return true;
}
