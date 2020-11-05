let id = '';

$('.btn-danger').click(function(e){
    id = $(this).attr('id');


    // $.ajax({
    //     url: `/bookmark/${id}?_method=DELETE`,
    //     success: (data=>{
    //         if(!data.error){
    //             swal({  //sweetalert.js library
    //                 title:  `Deleted Bookmark`,
    //                 text: `Kudos! You've successfully deleted the bookmark. `,
    //                 icon: "success",    
    //                 timer: 5500,
    //                 closeOnClickOutside: false  
    //           });

    //           setInterval(()=>{
    //               window.location.reload()
    //           },3000)
    //         }
    //     })
    // })


    axios({
        method: 'POST',
        url: `/bookmark/${id}?_method=DELETE`,
        responseType: 'stream'
      })
      .then(response=>{
            swal({  //sweetalert.js library
                title:  `Deleted Bookmark`,
                text: `Kudos! You've successfully deleted the bookmark. `,
                icon: "success",    
                timer: 5500,
                closeOnClickOutside: false  
            });

            setInterval(()=>{
                window.location.reload()
            },3000)
        })
        .catch(err=>console.log(err))

})


$('.upd_btn').click(function(e){
    e.preventDefault();
    id = $(this).attr('id');
    let name = $(this).attr('rel');
    let desc = $(this).attr('href');
    let url = $(this).data('url');


    $('.edit_form').fadeIn('slow')
    $('#edit_name').attr('value', name);
    $('#edit_url').attr('value', url);
    $('#edit_description').html(desc);
    $('#edit_info').html(`Editing Bookmark- ${name}`);
})


   

$('#edit_form').submit(function(e){
    e.preventDefault();
    let data = $(this).serialize();

    axios({
        method: 'Post',
        url:   `/bookmark/${id}?_method=PUT&${data}`,
        data: data
      })
      .then(response=>{
        swal({  //sweetalert.js library
            title:  `Updated Bookmark`,
            text: `Kudos! You've successfully updated the bookmark. `,
            icon: "success",    
            timer: 5500,
            closeOnClickOutside: false  
        });

        setInterval(()=>{
            window.location.reload()
        },3000)
      })
      .catch(err=>console.log(err))

})