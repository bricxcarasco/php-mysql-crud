$(document).ready(function() {

    //Eto ung method sa pagtawag ng function para ma populate yung table at lagyan ng laman galing database
    getPersonalInformationList();

    //Function para ma populate yung table at lagyan ng laman galing database
    function getPersonalInformationList() {
        $.ajax({
            type: "post",
            url: "../controller/CrudController?getPersonalInformationList",
            dataType: "json",
            data: {
                
            },
            success: function(data) {
                console.log(data);
                $("#tablePersonalInformation tbody").html("");
                $.each(data, function(i, e) {
                    var $tr = $("<tr id=" + e[0] + ">").append(
                        $("<td>").text(e[1]),
                        $("<td>").text(e[2]),
                        $("<td>").text(e[3]),
                        $("<td>").text(e[4]),
                        $("<td>").html("<a id='btnEditInfo' class='btn btn-outline-success'>Edit</a><a style='margin-left: 10px;' id='btnDeleteInfo' class='btn btn-outline-danger'>Delete</a>")
                    );
                    $tr.appendTo("#tablePersonalInformation tbody");
                });
            }
        });
    }

    //Ang pindutan ng modal na nagngangalang save at isasave nya papuntang database
    $("#modalPersonalInformation").on("click", "#btnSavePersonalInformation", function() {
        var firstname = $("#modalPersonalInformation #firstname").val();
        var lastname = $("#modalPersonalInformation #lastname").val();
        var gender = $("#modalPersonalInformation #gender").val();
        var email = $("#modalPersonalInformation #email").val();

        savePersonalInformationFromAddFunction(firstname, lastname, gender, email);
    })

    //Eto ung function para masave ung inadd mo sa database
    function savePersonalInformationFromAddFunction(Firstname, Lastname, Gender, Email) {
        $.ajax({
            type: "post",
            url: "../controller/CrudController?savePersonalInformationFromAddFunction",
            dataType: "json",
            data: {
                Firstname: Firstname,
                Lastname: Lastname,
                Gender: Gender,
                Email: Email
            },
            success: function(data) {
                alert(data);
                $("#modalPersonalInformation").modal("hide");
                getPersonalInformationList();
            }
        });
    }

    //Ang pindutan ng EDIT PERSONAL INFORMATION
    $("#tablePersonalInformation").on("click", "#btnEditInfo", function() {
        var personalId = $(this).closest('tr').attr('id');
        $("#modalEditPersonalInformation").modal("show");
        editPersonalInformation(personalId);
    });

    //And pindutan ng DELETE PERSONAL INFORMATION
    $("#tablePersonalInformation").on("click", "#btnDeleteInfo", function() {
        var personalId = $(this).closest('tr').attr('id');
        deletePersonalInformation(personalId);
    });

    //Ang proseso para ilabas ang inpormasyon papunta sa edit modal
    function editPersonalInformation(PersonalId) {
        $.ajax({
            type: "post",
            url: "../controller/CrudController?editPersonalInformation",
            dataType: "json",
            data: {
                PersonalId: PersonalId
            },
            success: function(data) {
                $.each(data, function(i, e) {
                    $("#modalEditPersonalInformation #personalIdHidden").text(e[0]);
                    $("#modalEditPersonalInformation #firstname").val(e[1]);
                    $("#modalEditPersonalInformation #lastname").val(e[2]);
                    $("#modalEditPersonalInformation #gender").val(e[3]);
                    $("#modalEditPersonalInformation #email").val(e[4]);
                });
            }
        });
    }

    // Ang pindutan ng UPDATE sa modal ng edit inpormasyon modal
    $("#modalEditPersonalInformation").on("click", "#btnUpdatePersonalInformation", function() {
        updatePersonalInformation();
    });

    //Ang proseso para masave o maupdate ang edit inpormasyon modal papuntang database
    function updatePersonalInformation() {
        $.ajax({
            type: "post",
            url: "../controller/CrudController?updatePersonalInformation",
            dataType: "json",
            data: {
                PersonalId: $("#modalEditPersonalInformation #personalIdHidden").text(),
                Firstname: $("#modalEditPersonalInformation #firstname").val(),
                Lastname: $("#modalEditPersonalInformation #lastname").val(),
                Gender: $("#modalEditPersonalInformation #gender").val(),
                Email: $("#modalEditPersonalInformation #email").val()
            },
            success: function(data) {
                alert(data);
                $("#modalEditPersonalInformation").modal("hide");
                getPersonalInformationList();
            }
        });
    }

    //Ang proseso para masave o maupdate ang edit inpormasyon modal papuntang database
    function deletePersonalInformation(PersonalId) {
        $.ajax({
            type: "post",
            url: "../controller/CrudController?deletePersonalInformation",
            dataType: "json",
            data: {
                PersonalId: PersonalId
            },
            success: function(data) {
                alert(data);
                getPersonalInformationList();
            }
        });
    }

});

