

<?php
    // -------------------
    // WhatsApp Number (Formatted for wa.me)
    // -------------------
    $whatsappNumber = '254702433233';
?>

<?php if($whatsappNumber): ?>
    <div id="whatsapp-widget">

        
        <div id="whatsapp-box" class="card shadow border-0">

            <div class="card-header whatsapp-green text-white fw-semibold">
                <i class="fab fa-whatsapp me-2"></i>
                Neptune’s Movers Support
            </div>

            <div class="card-body">

                <p class="small mb-2">
                    Send us a message and our team will respond on WhatsApp.
                </p>

                <textarea id="whatsapp-message" class="form-control mb-3 small" rows="3"
                    placeholder="Example: I want to move a 2-bedroom house next week"></textarea>

                <button id="whatsapp-send" class="btn whatsapp-green w-100 text-white">
                    <i class="fab fa-whatsapp me-1"></i>
                    Send Message
                </button>

            </div>

        </div>

        
        <button id="whatsapp-toggle" class="btn whatsapp-green rounded-circle shadow">

            <i class="fab fa-whatsapp text-white"></i>

        </button>

    </div>
<?php endif; ?>


<style>
    /* -------------------
    WhatsApp Brand Color
    ------------------- */
    .whatsapp-green {
        background-color: #25D366 !important;
        border-color: #25D366 !important;
    }

    .whatsapp-green:hover {
        background-color: #1ebe5d !important;
        border-color: #1ebe5d !important;
    }

    #whatsapp-widget {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 9999;
    }

    #whatsapp-toggle {
        width: 58px;
        height: 58px;
        font-size: 24px;

        display: flex;
        align-items: center;
        justify-content: center;

        animation: pulse 2.5s infinite;
    }

    #whatsapp-box {
        width: 320px;
        position: absolute;
        bottom: 75px;
        right: 0;
        display: none;
    }

    /* -------------------
    Green Pulse Animation
    ------------------- */
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(37, 211, 102, .4);
        }

        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
        }

        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }
</style>


<script>
    const toggle = document.getElementById('whatsapp-toggle');
    const box = document.getElementById('whatsapp-box');

    // -------------------
    // Toggle chat box
    // -------------------
    toggle.onclick = function(e) {
        e.stopPropagation();
        box.style.display = box.style.display === 'block' ? 'none' : 'block';
    };

    // -------------------
    // Close when clicking outside
    // -------------------
    document.addEventListener("click", function(event) {
        if (!box.contains(event.target) && event.target !== toggle) {
            box.style.display = "none";
        }
    });

    // -------------------
    // Send WhatsApp message
    // -------------------
    document.getElementById('whatsapp-send').onclick = function() {

        let message = document.getElementById('whatsapp-message').value;

        if (!message) {
            alert("Please enter your moving request details.");
            return;
        }

        let number = "<?php echo e($whatsappNumber); ?>";
        let url = "https://wa.me/" + number + "?text=" + encodeURIComponent(message);

        window.open(url, "_blank");
    };
</script>
<?php /**PATH C:\xampp\htdocs\neptunesmovers\resources\views/frontend/partials/chat-widget.blade.php ENDPATH**/ ?>