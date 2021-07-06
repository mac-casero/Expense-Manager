import ServiceCall from "./service/service_call";

class Dashboard {
    async getExpenseTotalPerCategoryList(){
        let data = [];
        await ServiceCall.getExpenseTotalPerCategoryList()
            .then(response => {
                response.data.forEach(expenseCategoryItem => {
                    const temp = {
                        Name : expenseCategoryItem.name,
                        Amount : expenseCategoryItem.total,
                    };
                    data.push(temp);
                });
            });
        this.data = data;
    }

    async onLoad() {
        await this.getExpenseTotalPerCategoryList();
        const data = this.data;

        $('#expense-category-total-table').DataTable().clear().destroy();
        $('#expense-category-total-table').DataTable({
            data: data,
            pageLength: 10,
            lengthChange: false,
            searching: false,
            columns: [
                { data: "Name", title: "Name" },
                { data: "Amount", title: "Amount" }
            ],
            columnDefs: [
                {
                "targets": [1],
                "render" : data => {
                    let amount = (data == null) ? 0 : data
                    return '$' + amount ;
                    }
                }
            ]
        });

        let pie_chart_data;
        await ServiceCall.getPieChartData()
        .then(response => {
            pie_chart_data = response.data;
        });
        if(pie_chart_data != ''){
            var ctx = document.getElementById('expense-pie-chart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: pie_chart_data.labels,
                    datasets: [{
                        data: pie_chart_data.data,
                        backgroundColor: pie_chart_data.backgroundColor,
                        hoverOffset: pie_chart_data.hoverOffset
                    }]
                }
            });
            $("#no-data-display").css('display','none');
            $("#expense-pie-chart").css('display','block');
            $(".dashboard-items").css('display','inline-block');
        }else{
            $("#no-data-display").css('display','block');
            $("#expense-pie-chart").css('display','none');
            $(".dashboard-items").css('display','inline-flex');
        }
    }
}

export default new Dashboard;

