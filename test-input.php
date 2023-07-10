<?php
$put_do_faila = '/admin/?edit=1624';
?>
<form id='form' method='post' action='' class='decorated-form'>
    <input id="file-upload" type="file" name="file">
    <input id="submit-button" type="submit" value="Upload">
</form>

<script type="text/javascript">
    const fileInput = document.getElementById('file-upload');
    const form = document.getElementById('form');
    const submitButton = document.getElementById('submit-button');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!fileInput.files.length) {
            alert("You must select at least one file.");
            return;
        }

        submitButton.disabled = true;  // Disable the button temporarily

        const formData = new FormData();
        formData.append('file', fileInput.files[0]);

        fetch('<?= $put_do_faila ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            submitButton.disabled = false;  // Re-enable the button
        });
    });
</script>
