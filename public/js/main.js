function csrfHeader() {
    return {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };
}



function loadHtml(target, url) {
    $(target).html(`
    <div class='text-center my-5'>
        <div class='spinner-border  '></div>
    </div>`)
        .load(url);
}



function copyToClipBoard(textToCopy, event = null, showToast = true) {

    if (event) {
        event.stopPropagation();
        event.preventDefault();
    }
    if (showToast) {
        toast({
            message: messages["link_copied"],
            type: "success",
            appendTo: "#dashboardContent"
        });
    }


    // navigator clipboard api needs a secure context (https)
    if (navigator.clipboard && window.isSecureContext) {
        // navigator clipboard api method'
        return navigator.clipboard.writeText(textToCopy);
    } else {
        // text area method
        let textArea = document.createElement("textarea");
        textArea.value = textToCopy;
        // make the textarea out of viewport
        textArea.style.position = "fixed";
        textArea.style.left = "-999999px";
        textArea.style.top = "-999999px";
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        return new Promise((res, rej) => {
            // here the magic happens
            document.execCommand('copy') ? res() : rej();
            textArea.remove();
        });
    }
}



function toast(options = {
    message: "",
    class: "",
    style: "",
    id: "",
    appendTo: "",
    duration: "",
    type: ""

}) {


    if (window["toastId"] == undefined) {
        window["toastId"] = 0;
    }

    if (options.id == undefined) {
        window["toastId"]++;
        options.id = `jsToast_${window["toastId"]}`;

    }

    if (options.appendTo == undefined) {
        options.appendTo = "body";
    }
    if (options.duration == undefined) {
        options.duration = 3000;
    }
    if (options.status !== undefined) {
        options.type = options.status;
    }

    if (options.type == undefined) {
        options.type = "success";
    }

    var dataIcon = "";
    if (options.type == "success") {
        dataIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><mask id="ipSSuccess0"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path fill="#fff" stroke="#fff" d="m24 4l5.253 3.832l6.503-.012l1.997 6.188l5.268 3.812L41 24l2.021 6.18l-5.268 3.812l-1.997 6.188l-6.503-.012L24 44l-5.253-3.832l-6.503.012l-1.997-6.188l-5.268-3.812L7 24l-2.021-6.18l5.268-3.812l1.997-6.188l6.503.012L24 4Z"/><path stroke="#000" d="m17 24l5 5l10-10"/></g></mask><path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSSuccess0)"/></svg>';
    } else if (options.type == "danger") {
        dataIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.27 3L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3M8.41 7L12 10.59L15.59 7L17 8.41L13.41 12L17 15.59L15.59 17L12 13.41L8.41 17L7 15.59L10.59 12L7 8.41"/></svg>';
    } else if (options.type == "warning") {
        dataIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.27 3L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3M8.41 7L12 10.59L15.59 7L17 8.41L13.41 12L17 15.59L15.59 17L12 13.41L8.41 17L7 15.59L10.59 12L7 8.41"/></svg>';
    }
    if (options.type == "info") {
        dataIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="currentColor" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2a1 1 0 0 0 0 2z"/></svg>';
    }



    var toast = `
     <div id="${options.id}" class="pointer position-fixed top-0 start-0 end-0  mt-2 mx-auto shadow rounded bg-white p-3 w-fit  border-start border-4 text-${options.type} border-${options.type}  ${options.class}"
     style="min-width:300px;max-width:400px;z-index: 9999;transform:translateY(-100px);opacity:0;transition:all 0.3s;  ${options.style}"
     onclick='$(this).fadeOut()'
     >
        ${dataIcon}
        <span class='fw-bold ms-1'>${options.message}</span>
     </div>`;

    $(options.appendTo).append(toast);
    setTimeout(function() {

        $(`#${options.id}`).css({
            "transform": "translateY(20px)",
            "opacity": 1,
            "pointer-event": "initial"
        });

        setTimeout(function() {
            $(`#${options.id}`).css({
                "transform": `translateY(-100px)`,
                "opacity": 0,
                "pointer-event": "none"
            });
            setTimeout(() => $(`#${options.id}`).remove(), 500);

        }, options.duration);

    }, 100);



}


function message(options = {
    type: "success",
    title: "Title",
    message: "Message"
}) {

    var messageHtml = `<div class="container p-0">
        <div class="row shadow rounded border-start border-5 border-${options.type} p-4 bg-white my-1">
            <div class="col-12">
                <div class="d-flex align-items-center gap-2 text-${options.type} fs-1">
                ${options.type == 'success'
            ? `<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48"><mask id="ipSSuccess0"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><path fill="#fff" stroke="#fff" d="m24 4l5.253 3.832l6.503-.012l1.997 6.188l5.268 3.812L41 24l2.021 6.18l-5.268 3.812l-1.997 6.188l-6.503-.012L24 44l-5.253-3.832l-6.503.012l-1.997-6.188l-5.268-3.812L7 24l-2.021-6.18l5.268-3.812l1.997-6.188l6.503.012L24 4Z"/><path stroke="#000" d="m17 24l5 5l10-10"/></g></mask><path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSSuccess0)"/></svg>`
            : `<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M8.27 3L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3M8.41 7L12 10.59L15.59 7L17 8.41L13.41 12L17 15.59L15.59 17L12 13.41L8.41 17L7 15.59L10.59 12L7 8.41"/></svg>`
        }
                    <h1>${options.title}</h1>
                </div>
                <p class="fs-2">
                   ${options.message}
                </p>
    
            </div>
        </div>
    </div>`;
    if (options.target == undefined) {
        return messageHtml;

    }
    $(options.target).html(messageHtml);

}

$.fn.flex = function () {
    $(this).css("display", "flex");
};