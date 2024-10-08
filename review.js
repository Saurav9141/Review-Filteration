document.addEventListener('DOMContentLoaded', function () {
    const ratingInputs = document.querySelectorAll('.star-rating input');
    const ratingValue = document.getElementById('rating');
    const feedbackForm = document.getElementById('feedback-form');
    const reviewForm = document.getElementById('review-form');
    const submitReviewButton = document.getElementById('submit-review-button');
    
    ratingInputs.forEach((input) => {
        input.addEventListener('change', function() {
            ratingValue.value = this.value;
            handleRatingSubmission(this.value);
        });
    });

    submitReviewButton.addEventListener('click', function() {
        // Redirect to the reviews page
        window.location.href = 'reviews.html';
    });
});

function handleRatingSubmission(rating) {
    const feedbackForm = document.getElementById('feedback-form');
    const reviewForm = document.getElementById('review-form');

    if (rating <= 3) {
        // Show the feedback form
        feedbackForm.classList.remove('hidden');
        reviewForm.classList.add('hidden');
    } else {
        // Show the review form
        reviewForm.classList.remove('hidden');
        feedbackForm.classList.add('hidden');
    }
}

function submitFeedback() {
    // Directly redirect to feedback.html without any alert
    window.location.href = 'feedback.html'; // Redirect to feedback.html
}
