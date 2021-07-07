import ServiceCall from "./service/service_call";

class Roles {
    async getDataTableData(){
        let data = [];
        await ServiceCall.getRoleList()
            .then(response => {
                response.data.forEach(roles => {
                    const temp = {
                        Name : roles.name,
                        Description : roles.description,
                        Created_at : roles.created_at,
                        id: roles.id,
                    };
                    data.push(temp);
                });
            });
        this.data = data;
    }
    async onLoad() {
        await this.loadDatatable();
        
        const roles = this;
        $("#create_role_form").submit(function(){
            roles.submitCreateRole();
            return false;
        })
        $("#update_role_form").submit(function(){
            roles.submitUpdateRole();
            return false;
        })

        $('.dataTable').on('click', 'tbody tr', async function() {
            await roles.displayEditModal(this.id);
        })
    }
    
    async loadDatatable(){
        await this.getDataTableData();
        const data = this.data;
        console.log(data)
        $('#roles-table').DataTable().clear().destroy();
        $('#roles-table').DataTable({
            data: data,
            rowId: "id",
            columns: [
                { data: "Name", title: "Name" },
                { data: "Description", title: "Description" },
                { data: "Created_at", title: "Created at"},
            ]
        });
    }
    
    async displayEditModal(id){
        await ServiceCall.getRoleItem(id)
        .then(response => {
            if(response.data.name === 'Administrator'){
                $("#update-admin-role-error-modal").modal('show');
            }else{
                $("#name_update").val(response.data.name);
                $("#role_id_update").val(response.data.id);
                $("#description_update").val(response.data.description);
                $("#update-role-modal").modal('show');
            }
        });
    }

    async submitCreateRole(){
        let data = new FormData();
        data.append("name",$("#name_create").val());
        data.append("description",$("#description_create").val());
        
        const roles = this;
        await ServiceCall.createRole(data)
        .then(function (response) {
            $("#create-role-modal").modal('hide');
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            roles.loadDatatable();
        });
    }

    async submitUpdateRole(){
        let data = new FormData();
        data.append("name",$("#name_update").val());
        data.append("description",$("#description_update").val());
        
        const roles = this;
        const id = $("#role_id_update").val();
        await ServiceCall.updateRole(data, $("#role_id_update").val())
        .then(function (response) {
            $("#update-role-modal").modal('hide');
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            roles.loadDatatable();
        });
    }

    async confirmDeleteRole(){
        $("#update-role-modal").modal('hide');
        $("#delete-role-confirmation").modal('show');
    }

    async closeDeleteRole(){
        $("#update-role-modal").modal('show');
        $("#delete-role-confirmation").modal('hide');
    }

    async submitDeleteRole(){
        const roles = this;
        const id = $("#role_id_update").val();
        await ServiceCall.deleteRole(id).then(function (response) {
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            roles.loadDatatable();
        });
    }
}

export default new Roles;

