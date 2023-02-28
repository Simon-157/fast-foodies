<link rel="stylesheet" href="public/css/user-profile.css">

<dialog id="mySizeChartModal" class="ebcf_modal">
    <div class="ebcf_modal-content">
        <span class="ebcf_close">&times;</span>
        <!-- <div class="container"> -->
            <div class="card">
                <div class="card__border">
                    <img src="https://images.unsplash.com/photo-1597223557154-721c1cecc4b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80"
                        alt="card image" class="card__img" />
                </div>

                <h3 class="card__name">Mia Miranda</h3>
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
                            <a href="/"  class="card__social-link">
                                <i class='bx bxs-folder-open tooltip' style='color:#ba9430'>
                                 <span class="tooltiptext">history</span>
                                </i>
                            </a>

                            <a href="/" class="card__social-link">

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