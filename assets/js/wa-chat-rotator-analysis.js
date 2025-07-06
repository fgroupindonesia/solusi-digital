 function requestData(datana, urlTujuan){


     $.ajax({
                    url: urlTujuan,
                    type: 'POST',
                    data: datana,
                    success: function(response) {
                      
                        let json = JSON.parse(response);

                        if(json.status == 'success'){
                            //alert('ada ');

                            
                            if(datana.jenis == JENIS_GROUP_RINGKAS){
                                let nama_group = [];
                                let jumlah_clicks = [];

                                for(i=0; i<json.data.length; i++){
                                    nama_group.push(json.data[i].group_name);
                                    jumlah_clicks.push(json.data[i].total_clicks);
                                }

                                renderDiagramLeadsGroup(nama_group, jumlah_clicks);    
                            }


                             if(datana.jenis == JENIS_DISTRIBUSI_CS){
                                let nama_cs = [];
                                let jumlah_clicks = [];
                                let data_status = [];
                                let jenis_dist = "";
                                let nama_group = "";

                                for(i=0; i<json.data.length; i++){
                                    nama_cs.push(json.data[i].cs_name);
                                    jumlah_clicks.push(json.data[i].total_leads);

                                    /*
                                    [ { name: 'Andi', status: 'Online' } ]
                                    */
                                    let statusna = 'Offline';
                                    if(json.data[i].cs_status == 'enabled'){
                                        statusna = 'Online';
                                    }

                                    let orang = {name: json.data[i].cs_name, status: statusna};
                                    data_status.push(orang);

                                    jenis_dist = json.data[i].group_distribution;
                                    nama_group = json.data[i].group_name;

                                }

                                renderDiagramDistribusiCS(nama_group, jenis_dist, nama_cs, jumlah_clicks, data_status);  

                                $('#wa-chat-rotator-btn-report').show();

                             }
                            

                        }


                        if(json.status == 'invalid'){

                            if(datana.jenis == JENIS_DISTRIBUSI_CS){
                                // clear the chart
                                // FIX ME!
                                $('#csStatusList').empty();
                                $('#csStatusList').append('<li class="list-group-item text-center text-muted">Tidak ada data status CS.</li>'); // Tampilkan placeholder

                                $('#jenis-distribusi-group').text('');

                                _chart_js_distribution.destroy();
                                _chart_js_distribution = null;

                                $('#wa-chat-rotator-btn-report').hide();

                            }


                        }

                        console.log(json);

                    },          
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        console.error('Response Text:', xhr.responseText);
                        alert('Terjadi kesalahan saat mengirim data!');
                    }
                });


 }

let _chart_js_distribution;


function renderDiagramDistribusiCS(namagroup, jenisdist, datacs, dataclicks, datastatus){

$('#jenis-distribusi-group').text(jenisdist);

const simulatedData = {
                csDistribution: {
                    groupName: namagroup, // Contoh untuk satu grup
                    labels: datacs,
                    data: dataclicks // Jumlah chat yang diterima masing-masing CS
                },
                csStatus: datastatus
            };

  // --- Chart: Distribusi Chat CS ---
            const csDistCtx = document.getElementById('csDistributionChart').getContext('2d');
          _chart_js_distribution =  new Chart(csDistCtx, {
                type: 'doughnut',
                data: {
                    labels: simulatedData.csDistribution.labels,
                    datasets: [{
                        label: 'Jumlah Chat',
                        data: simulatedData.csDistribution.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            // Tambahkan callback untuk menampilkan count dan persentase di legend
                            labels: {
                                generateLabels: function(chart) {
                                    const data = chart.data;
                                    if (data.labels.length && data.datasets.length) {
                                        const total = data.datasets[0].data.reduce((sum, value) => sum + value, 0);
                                        return data.labels.map((label, i) => {
                                            const value = data.datasets[0].data[i];
                                            const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                            return {
                                                text: `${label}: ${value} Leads (${percentage}%)`,
                                                fillStyle: data.datasets[0].backgroundColor[i],
                                                strokeStyle: data.datasets[0].borderColor[i],
                                                lineWidth: 1,
                                                hidden: chart.getDatasetMeta(0).data[i].hidden,
                                                index: i
                                            };
                                        });
                                    }
                                    return [];
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    const value = context.parsed;
                                    const total = context.dataset.data.reduce((sum, val) => sum + val, 0);
                                    const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                    label += `${value} Leads (${percentage}%)`;
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // --- CS Status List ---
            const csStatusList = $('#csStatusList');
            simulatedData.csStatus.forEach(cs => {
                const statusClass = cs.status === 'Online' ? 'text-success' : 'text-danger';
                const statusIcon = cs.status === 'Online' ? '🟢' : '🔴'; // Green/Red circle for status
                csStatusList.append(`
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ${cs.name}
                        <span class="${statusClass} fw-bold">
                            ${statusIcon} ${cs.status}
                        </span>
                    </li>
                `);
            });

}

function renderDiagramLeadsGroup(datagroup, dataclicks){

 const simulatedData = {
                clicksPerGroup: {
                    labels: datagroup,
                    data: dataclicks
                }};

    // --- Chart: Jumlah Klik per Grup Link ---
            const clicksCtx = document.getElementById('clicksPerGroupChart').getContext('2d');
            new Chart(clicksCtx, {
                type: 'bar',
                data: {
                    labels: simulatedData.clicksPerGroup.labels,
                    datasets: [{
                        label: 'Jumlah Klik',
                        data: simulatedData.clicksPerGroup.data,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(54, 162, 235, 0.6)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Leads'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: '-'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Hide legend if only one dataset
                        }
                    }
                }
            });


}

// cara kerja
const JENIS_GROUP_RINGKAS = "group-ringkas";
const JENIS_DISTRIBUSI_CS = "distribusi-cs";

const URL_REQUEST_DATA_WA_CHAT_ROTATOR_ANALYSIS = "/request-wa-chat-rotator-analysis";

 $(document).ready(function() {

            let us = $('#nav-username').val();
            let datana = {username : us, jenis : JENIS_GROUP_RINGKAS};

            // minta data ke server
            requestData(datana, URL_REQUEST_DATA_WA_CHAT_ROTATOR_ANALYSIS);

            
            // saat drop down diclick
            $('body').on('change', '#groupDistribusiFilter', function(){

                let us = $('#nav-username').val();
                let gpid = $('#groupDistribusiFilter').val();
                
                let datana2 = {id : gpid, username : us, jenis : JENIS_DISTRIBUSI_CS};

                // minta data ke server
                requestData(datana2, URL_REQUEST_DATA_WA_CHAT_ROTATOR_ANALYSIS);

            });
            

            
         
        
});