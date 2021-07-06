import ServiceCall from "./service/service_call";

class Users {
    constructor() {
        this.roles = [];
    }
    async getDataTableData(){
        let data = [];
        await ServiceCall.getUserList()
            .then(response => {
                response.data.forEach(users => {
                    console.log(users)
                    const temp = {
                        Name : users.name,
                        Email : users.email,
                        Role: users.role,
                        Created_at : users.created_at,
                        id: users.id,
                    };
                    data.push(temp);
                });
            });
        this.data = data;
    }
    async onLoad() {
        await this.getRolesList();
        await this.loadDatatable();
        
        const users = this;

        if(this.roles.length == 0){
            $("#add_user_btn").prop('disabled',true);
        }
        $("#create_user_form").submit(function(){
            users.submitCreateUser();
            return false;
        })
        $("#update_user_form").submit(function(){
            users.submitUpdateUser();
            return false;
        })

        $('.dataTable').on('click', 'tbody tr', async function() {
            await users.displayEditModal(this.id);
           $("#update-user-modal").modal('show');
        })
    }

    async getRolesList(){
        await ServiceCall.getRoleList()
        .then(response => {
            this.roles = response.data;
        });
    }
    
    async loadDatatable(){
        
        await this.getDataTableData();
        const data = this.data;
        console.log(data)
        $('#users-table').DataTable().clear().destroy();
        $('#users-table').DataTable({
            data: data,
            rowId: "id",
            columns: [
                { data: "Name", title: "Name" },
                { data: "Email", title: "Email Address" },
                { data: "Role", title: "Role" },
                { data: "Created_at", title: "Created_at"},
            ]
        });
    }

    async displayCreateModal(){
        $('#role_create').empty()
        .append('<option default disabled selected value=""></option>')
        this.roles.forEach(category => {
            $('#role_create').append( '<option value="'+category.id+'">'+category.name+'</option>' );
        })
    }
    
    async displayEditModal(id){
        $('#role_update').empty()
        .append('<option default disabled selected value=""></option>')
        this.roles.forEach(category => {
            $('#role_update').append( '<option value="'+category.id+'">'+category.name+'</option>' );
        })
        await ServiceCall.getUserItem(id)
        .then(response => {
            $('#role_update option[value='+response.data.role_id+']').attr('selected','selected');
            $("#name_update").val(response.data.name);
            $("#email_update").val(response.data.email);
            $("#user_id_update").val(response.data.id);
        });
    }

    
    async submitCreateUser(){
        let data = new FormData();
        data.append("name",$("#name_create").val());
        data.append("email", $("#email_create").val());
        data.append("role_id", $("#role_create").val());
        
        const users = this;
        const id = $("#user_id_update").val();
        await ServiceCall.createUser(data)
        .then(function (response) {
            $("#create-user-modal").modal('hide');
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            users.loadDatatable();
        });
    }

    async submitUpdateUser(){
        let data = new FormData();
        data.append("name",$("#name_update").val());
        data.append("email",$("#email_update").val());
        data.append("role_id",$("#role_update").val());
        
        const users = this;
        const id = $("#user_id_update").val();
        await ServiceCall.updateUser(data, $("#user_id_update").val())
        .then(function (response) {
            $("#update-user-modal").modal('hide');
            $('.alert-success').css('display','block');
            users.loadDatatable();
        });
    }

    async submitDeleteUser(){
        const users = this;
        const id = $("#user_id_update").val();
        await ServiceCall.deleteUser(id).then(function (response) {
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            users.loadDatatable();
        });
    }
}

export default new Users;

