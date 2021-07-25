$(function() {

    var owner = $('#owner');
    var cardNumber = $('#cardNumber');
    var cardNumberField = $('#card-number-field');
    var CVV = $("#cvv");
    var confirmButton = $('#confirm-purchase');

    // Use the payform library to format and validate
    // the payment fields.

    cardNumber.payform('formatCardNumber');
    CVV.payform('formatCardCVC');

    confirmButton.click(function(e) {

        e.preventDefault();
		
        var isCardValid = $.payform.validateCardNumber(cardNumber.val());
        var isCvvValid = $.payform.validateCardCVC(CVV.val());

        if(owner.val().length < 5){
			xdialog.alert("Wrong owner name");
        } else if (!isCvvValid) {
            xdialog.alert("Wrong CVV");
        } else {
			let url1 = 'success.php?id=';
			let url2 = phpVars;
			window.location = url1.concat(url2);
        }
    });
});
