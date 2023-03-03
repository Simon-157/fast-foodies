<link rel="stylesheet" href="public/css/user-profile.css">
<script src="public/scripts/main.js"></script>
<dialog id="mySizeChartModal" class="ebcf_modal">
    <div class="ebcf_modal-content">
        <span class="ebcf_close">&times;</span>
        <!-- <div class="container"> -->
        <div class="card">
            <div class="card__border">
                <img id="avartar2" alt="card image" class="card__img" />
            </div>

            <h3 class="card__name" id="user-name"></h3>
            <span class="card__profession">Interpreter</span>

            <div class="card__social" id="card-social">
                <div class="card__social-control">
                    <!-- Toggle Button -->
                    <div class="card__social-toggle" id="card-toggle">
                        <i class='bx bxs-plus-circle'></i>
                    </div>

                    <span class="card__social-text">My Space</span>

                    <!-- Card Social -->
                    <ul class="card__social-list">
                        <a href="#" class="card__social-link">
                            <i class='bx bxs-folder-open tooltip' style='color:#ba9430'>
                                <span class="tooltiptext">history</span>
                            </i>
                        </a>

                        <a href="#" class="card__social-link">

                            <i class='bx bxs-edit tooltip' style='color:#ba9430'>
                                <span class="tooltiptext">edit</span>
                            </i>
                        </a>

                        <a href="/fast-foodies/logout" class="card__social-link">
                            <i class='bx bx-log-out-circle tooltip' style='color:#ba9430'>
                                <span class="tooltiptext">logout</span>

                            </i>
                        </a>
                    </ul>
                </div>
            </div>
            <!-- </div> -->
        </div>

    </div>

</dialog>
<script src="public/scripts/user-profile.js"></script>