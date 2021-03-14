$(function () {
    var colors = ['#17a2b8', '#28a745', '#ffc107', '#dc3545', '#666666', '#000000'];

    // Ordens de serviço
    // Pega o elemento e cria a instância do chart
    var ordersCtx = $("#orders");
    var ordersChart = new Chart(ordersCtx);

    /**
     * Evento do botão para chamar a API Jquery
     */
    $(".orders").click(function(){
        var id = $(this).attr('id').replace('orders_', '');
        getOrders(id);
    });

    /**
     * Chama a API para obter os dados
     *
     * @param {string} date
     */
    function getOrders(date) {
        $.ajax({
            url: 'stats-' + date,
            dataType: 'json',
            success: function (response) {
                var labels = Object.keys(response);
                var data = Object.values(response);
                createOrdersChart(labels, data);
            }
        })
    }

    /**
     * Cria o convas com o Gráfico através do Chart.js
     *
     * @param {array} labels
     * @param {array} data
     */
    function createOrdersChart(labels, data) {
        ordersChart.destroy();
        ordersChart = new Chart(ordersCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ordens de serviço',
                    data: data,
                    borderWidth: 1,
                    borderColor: '#28a745',
                    backgroundColor: '#ffc107'
                }],
            },
            options: {
                legend: {
                    position: 'bottom'
                },
            }
        });
    }
    
    getOrders('today');
    

})