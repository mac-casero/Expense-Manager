import ServiceCall from "./service/service_call";

class expenseCategory {
    async getDataTableData(){
        let data = [];
        await ServiceCall.getExpenseCategoryList()
            .then(response => {
                response.data.forEach(category => {
                    const temp = {
                        Name : category.name,
                        Description : category.description,
                        Created_at : category.created_at,
                        id: category.id
                    };
                    data.push(temp);
                });
            });
        this.data = data;
    }
    async onLoad() {

        await this.loadDatatable();
        
        const expense_category = this;
        $("#create_category_form").submit(function(){
            expense_category.submitCreateCategory();
            return false;
        })
        $("#update_category_form").submit(function(){
            expense_category.submitUpdateCategory();
            return false;
        })

        $('.dataTable').on('click', 'tbody tr', async function() {
            await expense_category.displayEditModal(this.id);
           $("#update-category-modal").modal('show');
        })

        
    }

    async loadDatatable(){
        await this.getDataTableData();
        const data = this.data;
        $('#expense-category-table').DataTable().clear().destroy();
        $('#expense-category-table').DataTable({
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
        await ServiceCall.getCategoryItem(id)
        .then(response => {
            $("#name_update").val(response.data.name);
            $("#category_id_update").val(response.data.id);
            $("#description_update").val(response.data.description);
        });
    }

    async submitCreateCategory(){
        let data = new FormData();
        data.append("name",$("#name_create").val());
        data.append("description",$("#description_create").val());
        
        const expense_category = this;
        await ServiceCall.createCategory(data)
        .then(function (response) {
            $("#create-category-modal").modal('hide');
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            expense_category.loadDatatable();
        });
    }

    async submitUpdateCategory(){
        let data = new FormData();
        data.append("name",$("#name_update").val());
        data.append("description",$("#description_update").val());
        
        const expense_category = this;
        const id = $("#category_id_update").val();
        await ServiceCall.updateCategory(data, $("#category_id_update").val())
        .then(function (response) {
            $("#update-category-modal").modal('hide');
            $('.alert-success').css('display','block');
            expense_category.loadDatatable();
        });
    }

    async submitDeleteCategory(){
        const expense_category = this;
        const id = $("#category_id_update").val();
        await ServiceCall.deleteCategory(id).then(function (response) {
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            expense_category.loadDatatable();
        });
    }
}

export default new expenseCategory;

