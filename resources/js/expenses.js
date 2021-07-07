import ServiceCall from "./service/service_call";

class Expenses {
    constructor() {
        this.expense_categories = [];
    }

    async getDataTableData(){
        let data = [];
        await ServiceCall.getExpenseList()
            .then(response => {
                response.data.forEach(expense => {
                    const temp = {
                        Name : expense.name,
                        Amount : expense.amount,
                        Entry_date: expense.entry_date,
                        Created_at : expense.created_at,
                        id: expense.id
                    };
                    data.push(temp);
                });
            });
        this.data = data;
    }
    async getExpenseCategoryList(){
        await ServiceCall.getExpenseCategoryList()
        .then(response => {
            this.expense_categories = response.data;
        });
    }
    async displayCreateModal(){
        $('#expense_cetegory_create').empty()
        .append('<option default disabled selected value=""></option>')
        this.expense_categories.forEach(category => {
            $('#expense_cetegory_create').append( '<option value="'+category.id+'">'+category.name+'</option>' );
        })
        document.getElementById("entry_date_create").max = new Date().toISOString().split("T")[0];
    }
    
    async displayEditModal(id){
        $('#expense_cetegory_update').empty()
        .append('<option default disabled selected value=""></option>')
        this.expense_categories.forEach(category => {
            $('#expense_cetegory_update').append( '<option value="'+category.id+'">'+category.name+'</option>' );
        })
        await ServiceCall.getExpenseItem(id)
        .then(response => {
            $('#expense_cetegory_update option[value='+response.data.expense_category_id+']').attr('selected','selected');
            $("#amount_update").val(response.data.amount);
            $("#expense_id_update").val(response.data.id);
            $("#entry_date_update").val(response.data.entry_date);
        });
        document.getElementById("entry_date_update").max = new Date().toISOString().split("T")[0];
    }

    async onLoad() {
        
        await this.getExpenseCategoryList();
        await this.loadDatatable();
        
        const expenses = this;

        if(this.expense_categories.length == 0){
            $("#add_expense_btn").prop('disabled',true);
        }
        $("#create_expense_form").submit(function(){
            expenses.submitCreateExpense();
            return false;
        })
        $("#update_expense_form").submit(function(){
            expenses.submitUpdateExpense();
            return false;
        })

        $('.dataTable').on('click', 'tbody tr', async function() {
            await expenses.displayEditModal(this.id);
           $("#update-expense-modal").modal('show');
        })
    }

    async loadDatatable(){
        await this.getDataTableData();
        const data = this.data;
        $('#expenses-table').DataTable().clear().destroy();
        $('#expenses-table').DataTable({
            data: data,
            rowId: "id",
            columns: [
                { data: "Name", title: "Expense Category" },
                { data: "Amount", title: "Amount" },
                { data: "Entry_date", title: "Entry Date" },
                { data: "Created_at", title: "Created at"},
            ],
            columnDefs: [
                {
                "targets": [1],
                "render" : data => {
                    return '$' + data;
                    }
                }
            ]
        });
    }

    async submitCreateExpense(){
        let data = new FormData();
        data.append("expense_category_id",$("#expense_cetegory_create").val());
        data.append("amount", $("#amount_create").val());
        data.append("entry_date", $("#entry_date_create").val());
        
        const expenses = this;
        const id = $("#expense_id_update").val();
        await ServiceCall.createExpense(data)
        .then(function (response) {
            $("#create-expense-modal").modal('hide');
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            expenses.loadDatatable();
        });
    }

    async submitUpdateExpense(){
        let data = new FormData();
        data.append("expense_category_id",$("#expense_cetegory_update").val());
        data.append("amount",$("#amount_update").val());
        data.append("entry_date",$("#entry_date_update").val());
        
        const expenses = this;
        const id = $("#expense_id_update").val();
        await ServiceCall.updateExpense(data, $("#expense_id_update").val())
        .then(function (response) {
            $("#update-expense-modal").modal('hide');
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            expenses.loadDatatable();
        });
    }

    async submitDeleteExpense(){
        const expenses = this;
        const id = $("#expense_id_update").val();
        await ServiceCall.deleteExpense(id).then(function (response) {
            $('.alert-success').css('display','block');
            $('.alert-success').fadeOut(2000);
            expenses.loadDatatable();
        });
    }
}

export default new Expenses;

