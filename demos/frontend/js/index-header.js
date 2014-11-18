

$(function() {



                                $.ajax({
                                        url: "/home/get_select_area",
                                        dataType: "text",
                                        type: "POST",
                                        data: {
                                        },
                                        success: function(_html) {
                                                $("#shipidshow").append(_html);
                                                });

                                                                                                                                       });

})
