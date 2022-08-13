const boxes = document.querySelectorAll('#lesson');
boxes.forEach(box => {
    box.addEventListener('change', function () {
        var pass;
        var date = document.getElementById('date').value;
        var url = this.dataset.url
        var token = document.getElementsByTagName('meta');
        // if (this.value == 0) {
        //     // option.style.backgroundColor = 'green'
        //     this.parentElement.children[0].className = "gl";
        //     this.parentElement.className = "gl";
        // } else if (this.value == 1) {
        //     // option.style.backgroundColor ='red';
        //     this.parentElement.children[0].className = "yl";
        //     this.parentElement.className = "yl";
        // } else if (this.value == 2) {
        //     this.parentElement.children[0].className = "rl";
        //     this.parentElement.className = "rl";
        // } else if (this.value == 3) {
        //     this.parentElement.children[0].className = "bl";
        //     this.parentElement.className = "bl";
        // } else {
        //     // this.parentElement.children[0].className="wl";
        //     // this.parentElement.className="wl";
        // }
        pass = this.value;
        let formdata = new FormData();
        formdata.append("id", this.dataset.student)
        formdata.append("pass", pass);
        formdata.append('lesson_part', this.dataset.match);
        formdata.append('group', this.dataset.group);
        formdata.append('date', date);
        formdata.append('_token', `${token[5].content}`);
        fetch(url, {
            method: 'POST',
            headers: {
                "_token": `${token[5].content}`,
            },
            body: formdata
        })
            .then((response) => response.json())
            .then((json) => {
                if (json) {
                    console.log(json)
                }
            })
            .catch((error) => {
                console.error(error);
            });
        window.location.reload();
    });
});




