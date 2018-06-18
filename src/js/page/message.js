var Message = function () {

    this.init = function () {
        this.chat();
    }

    this.event = function () {

    }
    this.loadAdllMsg = function () {
        $("#chat").on('submit', function(e) {
            e.preventDefault();
            // Send the form with Ajax
            var datas = $(this).serialize();
            $.ajax({
                url:'./core/messages-services.php',
                data:action=loadMessages,
                method: 'post',
                success: function(response) {
                    $('#messages').html(response)
                },
                error: function(errorMsg) {
                    alert(errorMsg);
                }
            });
        });
    }
    this.chat = function () {
        $("#chat").on('submit', function(e) {
            e.preventDefault();
            // Send the form with Ajax
            var datas = $(this).serialize();
            $.ajax({
                url:'./core/messages-services.php',
                data:datas,
                method: 'post',
                success: function(response) {
                  alert(response);
                },
                error: function(errorMsg) {
                    alert(errorMsg);
                }
            });
        });
    }



    this.init();
    this.event();
}

module.exports = Message;

