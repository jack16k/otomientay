
// function() {
//   var e = $(this).closest(".setup-content"),
//     t = e.attr("id"),
//     i = $('ul.setup-panel a[href="#' + t + '"]').parent().next().children("a"),
//     o = e.find("input, textarea"),
//     l = e.find("select"),
//     r = !0,
//     s = !1;
//   $(".form-group").removeClass("has-error").removeClass("has-success");
//   var c = n(o);
//   c && ((r = !1) || (c[0].focus(), s = !0));
//   var d = a(l);
//   if (d && (r = !1, s || r || (s = !0, d[0].focus())), e.find("div#img-upload").length && $("form").find('input[name="images[]"]').length < 1) {
//     r = !1, $("form").find('input[name="images[]"]').addClass("has-error");
//     var u = $("div#img-upload").closest("fieldset");
//     s || r || $("html, body").animate({
//       scrollTop: u.offset().top - 70
//     }, "fast"), u.find("div.status").empty(), u.append('<div class="status">Upload ít nhất 1 hình ảnh sản phẩm</div>')
//   }
//   r && (i.closest("li").removeClass("disabled"), i.trigger("click"))
// }

(function(){
    var elements = document.querySelectorAll(".form-post .btnNext");
    for(let ele of elements){
        ele.addEventListener('click',function(e){
            var parent = this.closest('.setup-content');
            var errorDivs = parent.querySelectorAll('.error-message');
            errorDivs.forEach(function(e) {
                e.remove();
            }, this);
            var inputs = parent.querySelectorAll("input,textarea");
            var hasError = false;
            for(let input of inputs){
                if(!input.checkValidity()){
                    let div = document.createElement('div');
                    div.textContent = "Loi nhap lieu";
                    div.classList = "error-message"
                    input.before(div);
                    hasError = true;
                }
            }
            if(hasError)return;
            parent.style.display = "none";
            var page = +parent.dataset.page;
            var next = page + 1;
            console.log(page);
            var elements = document.querySelectorAll(".form-post .setup-content");
            for(let ele of elements){
                if(+ele.dataset.page == next){
                    console.log('found it');
                    ele.style.display = "";
                }
            }
            var uls = document.querySelectorAll(".form-post>ul");
            for(let ul of uls){
                var lis = ul.children;
                for(let li of lis){
                    if(+li.dataset.page <= next){
                        li.className = "active";
                    }else{
                        li.className = "disabled"
                    }
                }
            }
        })
    }
    var elements = document.querySelectorAll(".form-post .btnPrevious");
    for(let ele of elements){
        ele.addEventListener('click',function(e){
            var parent = this.closest('.setup-content');
            parent.style.display = "none";
            var page = +parent.dataset.page;
            var previous = page - 1;
            console.log(page);
            var elements = document.querySelectorAll(".form-post .setup-content");
            for(let ele of elements){
                if(+ele.dataset.page == previous){
                    console.log('found it');
                    ele.style.display = "";
                }
            }
            var uls = document.querySelectorAll(".form-post>ul");
            for(let ul of uls){
                var lis = ul.children;
                for(let li of lis){
                    if(+li.dataset.page <= previous){
                        li.className = "active";
                    }else{
                        li.className = "disabled"
                    }
                }
            }
        })
    }
    var meta = document.querySelector('meta[name="csrf-token"]').content;
    
    var dropZone = new Dropzone("div#img-upload",{
        url:"/raovat/file",
        headers:{'X-CSRF-Token': meta},
        previewsContainer:(function(){return document.querySelector('.dropzone-previews')})(),
        addRemoveLinks:true,
        init:function(){
            this.on('removedfile',function(file){
                var link = `file/${file.name}`;
                $.ajax({
                    type:"DELETE",
                    url:link,
                    headers:{'X-CSRF-Token': meta,'Content-Type':'application/json'},
                    success:function(data){
                        let hiddenDiv = document.querySelector("#img-check");
                        let counter = +hiddenDiv.value;
                        hiddenDiv.value = counter - 1;
                    }
                })
            })
        },
        error: function(file, response) {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },
        success: function(file,done) {
            let hiddenDiv = document.querySelector("#img-check");
            let counter = +hiddenDiv.value;
            hiddenDiv.value = counter + 1;
            if (file.previewElement) {
                return file.previewElement.classList.add("dz-success");
            }
        }
        // previewTemplate: `<div class=\"dz-preview dz-file-preview\">
        //         <div class=\"dz-image\"><img data-dz-thumbnail /></div>
        //         <div class=\"dz-details\">
        //             <div class=\"dz-size\"><span data-dz-size></span>
        //             </div>
        //             <div class=\"dz-filename\"><span data-dz-name></span>
        //             </div>
        //         </div>
                
        //     </div>`
    });
})();
