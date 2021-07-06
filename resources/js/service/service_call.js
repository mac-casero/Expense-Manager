class ServiceCall {
    async getExpenseList(){
        return await axios.get(window.location.origin + '/expense-list');
    }

    async getExpenseCategoryList(){
        return await axios.get(window.location.origin + '/expense-category-list');
    }

    async getRoleList(){
        return await axios.get(window.location.origin + '/role-list');
    }

    async getUserList(){
        return await axios.get(window.location.origin + '/user-list');
    }
    
    async getPieChartData(){
        return await axios.get(window.location.origin + '/pie-chart-data');
    }

    async getExpenseTotalPerCategoryList(){
        return await axios.get(window.location.origin + '/expense-total-per-category');
    }

    async getExpenseItem(id){
        return await axios.get(window.location.origin + '/expense-item/'+id);
    }
    async createExpense(data){
        return await axios.post(window.location.origin + '/expense-item/create/',data);
    }
    async updateExpense(data, id){
        return await axios.post(window.location.origin + '/expense-item/update/'+id , data);
    }
    async deleteExpense(id){
        return await axios.post(window.location.origin + '/expense-item/delete/'+id);
    }

    async getCategoryItem(id){
        return await axios.get(window.location.origin + '/category-item/'+id);
    }
    async createCategory(data){
        return await axios.post(window.location.origin + '/category-item/create/',data);
    }
    async updateCategory(data, id){
        return await axios.post(window.location.origin + '/category-item/update/'+id , data);
    }
    async deleteCategory(id){
        return await axios.post(window.location.origin + '/category-item/delete/'+id);
    }

    async getRoleItem(id){
        return await axios.get(window.location.origin + '/role/'+id);
    }
    async createRole(data){
        return await axios.post(window.location.origin + '/role/create/',data);
    }
    async updateRole(data, id){
        return await axios.post(window.location.origin + '/role/update/'+id , data);
    }
    async deleteRole(id){
        return await axios.post(window.location.origin + '/role/delete/'+id);
    }

    async getUserItem(id){
        return await axios.get(window.location.origin + '/user/'+id);
    }
    async createUser(data){
        return await axios.post(window.location.origin + '/user/create/',data);
    }
    async updateUser(data, id){
        return await axios.post(window.location.origin + '/user/update/'+id , data);
    }
    async deleteUser(id){
        return await axios.post(window.location.origin + '/user/delete/'+id);
    }
}

export default new ServiceCall;
