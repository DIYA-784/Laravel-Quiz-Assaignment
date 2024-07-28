<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessages = document.querySelectorAll('.error-message');
            
            errorMessages.forEach(function(errorMessage) {
                // Set timeout to hide each error message after 5 seconds
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 5000); // Change 5000 to your desired timeout duration in milliseconds
            });
        });

        /// quiz btn activate one by one
        function nextValidation(event, currentIndex) {
            event.preventDefault(); 
            const currentQuiz = document.getElementById(`quiz-${currentIndex}`);
            currentQuiz.classList.add('disabled');
            currentQuiz.classList.remove('active');
            const nextIndex = currentIndex + 1;
            const nextQuiz = document.getElementById(`quiz-${nextIndex}`);

            if (nextQuiz) {
                nextQuiz.classList.remove('disabled');
                nextQuiz.classList.add('active');
            }
            
        }

        

    </script>
  </body>
</html>