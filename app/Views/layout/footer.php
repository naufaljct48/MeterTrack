</div>
</div>
</div>
<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
            <div class="text-body">

            </div>
            <div class="d-none d-lg-inline-block">
                © <script>
                    document.write(new Date().getFullYear())
                </script> Made with ❤️ by <a href="https://naufaljct48.github.io" target="_blank" class="footer-link">NaufalJCT48</a>
            </div>
        </div>
    </div>
</footer>
<!-- / Footer -->
<script src="<?php echo base_url(); ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/hammer/hammer.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/vendor/libs/i18n/i18n.js"></script> -->
<script src="<?php echo base_url(); ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/js/menu.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/%40form-validation/popular.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/%40form-validation/auto-focus.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages-auth.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/datatables/dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/datatables/dataTables.bootstrap5.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/datatables/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/datatables/responsive.bootstrap5.js"></script>
<script>
    $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            endDate: new Date(),
            autoclose: true,
            todayHighlight: true
        });

        $('.select2').select2({
            width: '100%',
            theme: 'bootstrap-5'
        });
    });

    function getWeatherInfo(weatherCode) {
        const weatherConditions = {
            0: {
                condition: 'Langit Cerah',
                icon: 'fa-sun',
                tempIcon: 'fa-thermometer-half'
            },
            1: {
                condition: 'Cerah Sebagian',
                icon: 'fa-cloud-sun',
                tempIcon: 'fa-thermometer-half'
            },
            2: {
                condition: 'Berawan Sebagian',
                icon: 'fa-cloud-sun',
                tempIcon: 'fa-thermometer-half'
            },
            3: {
                condition: 'Sepenuhnya Berawan',
                icon: 'fa-cloud',
                tempIcon: 'fa-thermometer-half'
            },
            45: {
                condition: 'Kabut',
                icon: 'fa-smog',
                tempIcon: 'fa-thermometer-half'
            },
            48: {
                condition: 'Kabut Rime yang Mengendap',
                icon: 'fa-smog',
                tempIcon: 'fa-thermometer-half'
            },
            51: {
                condition: 'Hujan Gerimis (Ringan)',
                icon: 'fa-cloud-drizzle',
                tempIcon: 'fa-thermometer-half'
            },
            53: {
                condition: 'Hujan Gerimis (Sedang)',
                icon: 'fa-cloud-drizzle',
                tempIcon: 'fa-thermometer-half'
            },
            55: {
                condition: 'Hujan Gerimis (Padat)',
                icon: 'fa-cloud-drizzle',
                tempIcon: 'fa-thermometer-half'
            },
            56: {
                condition: 'Hujan Gerimis Beku (Ringan)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            57: {
                condition: 'Hujan Gerimis Beku (Padat)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            61: {
                condition: 'Hujan (Ringan)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            63: {
                condition: 'Hujan (Sedang)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            65: {
                condition: 'Hujan (Lebat)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            66: {
                condition: 'Hujan Beku (Ringan)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            67: {
                condition: 'Hujan Beku (Lebat)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            71: {
                condition: 'Salju (Ringan)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            73: {
                condition: 'Salju (Sedang)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            75: {
                condition: 'Salju (Lebat)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            77: {
                condition: 'Butiran Salju',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            80: {
                condition: 'Hujan Rintik (Ringan)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            81: {
                condition: 'Hujan Rintik (Sedang)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            82: {
                condition: 'Hujan Rintik (Keras)',
                icon: 'fa-cloud-showers-heavy',
                tempIcon: 'fa-thermometer-half'
            },
            85: {
                condition: 'Hujan Salju (Ringan)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            86: {
                condition: 'Hujan Salju (Lebat)',
                icon: 'fa-snowflake',
                tempIcon: 'fa-thermometer-half'
            },
            95: {
                condition: 'Petir (Ringan atau Sedang)',
                icon: 'fa-bolt',
                tempIcon: 'fa-thermometer-half'
            },
            96: {
                condition: 'Petir dengan Hujan Es (Ringan)',
                icon: 'fa-bolt',
                tempIcon: 'fa-thermometer-half'
            },
            99: {
                condition: 'Petir dengan Hujan Es (Lebat)',
                icon: 'fa-bolt',
                tempIcon: 'fa-thermometer-half'
            }
        };

        return weatherConditions[weatherCode] || {
            condition: 'Kondisi Cuaca Tidak Diketahui',
            icon: 'fa-question',
            tempIcon: 'fa-thermometer-half'
        };
    }

    function fetchWeatherData() {
        fetch('https://api.open-meteo.com/v1/forecast?latitude=-6.125&longitude=106.625&current_weather=true')
            .then(response => response.json())
            .then(data => {
                const weather = data.current_weather;
                const weatherCode = weather.weathercode;

                const weatherInfo = getWeatherInfo(weatherCode);

                const weatherNavIcon = document.getElementById('weatherIcon');
                weatherNavIcon.className = `fas ${weatherInfo.icon}`;

                const weatherConditionElem = document.getElementById('weatherCondition');
                weatherConditionElem.innerHTML = `
                <i class="fas ${weatherInfo.icon} me-2"></i>${weatherInfo.condition}
            `;

                const temperatureElem = document.getElementById('temperatureText');
                temperatureElem.innerHTML = `
                <i class="fas ${weatherInfo.tempIcon} me-2"></i>${weather.temperature}°C
            `;

                const weatherTimeElem = document.getElementById('weatherTime');
                weatherTimeElem.style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching weather data:', error);
                document.getElementById('weatherCondition').textContent = 'Error mengambil data cuaca';
            });
    }

    document.addEventListener('DOMContentLoaded', fetchWeatherData);

    // Update data cuaca setiap 15 menit (900000 milidetik)
    setInterval(fetchWeatherData, 900000);
</script>
</body>

</html>