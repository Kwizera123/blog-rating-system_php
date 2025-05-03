</div>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="rating-plugin/dist/jquery.star-rating-svg.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js
"></script>

<footer class="py-3 bg-light my-4">
    <!-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul> -->
    <p class="text-center text-body-secondary">© 2025 Sinapy-Kwizera-Theo, Inc</p>
  </footer>



  <script>
  $(document).ready(function() {

       $(document).on('submit', function(e) {
        e.preventDefault();
          //alert('Form submitted');
          var formdata = $("#comment_data").serialize()+'&submit=submit';

          $.ajax({
            type: 'post',
            url: 'insert-comments.php',
            data: formdata,

            success:function() {
              //alert('success');
              $("#comment").val(null);
              $("#username").val(null);
              $("#post_id").val(null);

              $("#msg").html("Your Comment Added successfully").toggleClass("alert alert-success bg-success text-white mt-3");
              fetch();
            }
          });
       });

// for Delete comment

  $("#delete-btn").on('click', function(e) {
        e.preventDefault();
          //alert('Form submitted');
          var id = $(this).val();

          $.ajax({
            type: 'post',
            url: 'delete-comment.php',
            data: {
              delete: 'delete',
              id: id
            },

            success:function() {
             // alert(id);

             $("#delete-msg").html("Your Comment deleted successfully").toggleClass("alert alert-danger bg-danger text-white mt-3");
             fetch();
            }
          });
       });


       function fetch(){
        setInterval(function () {
          $("body").load("show.php?id=<?php echo $_GET['id']; ?>")
        }, 5000);
       }
// rating codes
       $(".my-rating").starRating({
    starSize: 25,

    initialRating: "<?php 

    if(isset($rating->rating) AND isset($rating->user_id) AND $rating->user_id == $_SESSION['user_id']) {
      echo $rating->rating;
    } else {
      echo '0';
    }
    ?>",

    callback: function(currentRating, $el){
        $("#rating").val(currentRating);

        $(".my-rating").click(function(e) {
          e.preventDefault();

          var formdata = $("#form-data").serialize()+'&insert=insert';

          $.ajax({
            type: "POST",
            url: 'insert-ratings.php',
            data: formdata,

            success:function() {
              //alert(formdata);
            }
          })

        })

    }
});

 // Live search
 $("#search_data").keyup(function() {
   var search = $(this).val();
   //alert(search);

   if(search !== '') {

    $.ajax({
      type: "POST",
      url: "search.php",
      data: {
        search: search
      },
        success: function(data) {
            $("#search-data").html(data);
        }
    })
   } else {
    $("#search-data").css('display', 'none');
   }
 })

  });
 </script>



</body>
</html>