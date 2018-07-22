<?php 
//load jquery
echo $this->Html->script('jquery-3.3.1');

//load react
echo $this->Html->script('https://unpkg.com/react@16/umd/react.development.js', ['crossorigin']);
echo $this->Html->script('https://unpkg.com/react-dom@16/umd/react-dom.development.js', ['crossorigin']);
//echo $this->Html->script('react/like_button.js');
?>
<?php 
    ?>
<script>
    //to see the order of the code execution, enable this
    var see_the_alert = false;
    
    //alternatively, disable the like_button.js and write the code here also works
    //below code is extensively modified for learning and testing purposes
    //best is to learn what the original code here https://reactjs.org/docs/add-react-to-a-website.html
    //use component below into multiple places https://gist.github.com/gaearon/faa67b76a6c47adbab04f739cba7ceda
    class LikeButtonz extends React.Component {
        constructor(props) {
            super(props);
            this.state = {liked: false};
            
            if (see_the_alert) {
                alert('HELLO WORLD');
            }
        }

        render() {
            if (this.state.liked) {
                if (see_the_alert) {
                    alert('DO NOT RUN');
                }
                
                return 'You liked this ' + this.props.remarks2;
            }
            else {
                if (see_the_alert) {
                    alert('WE ARE YOUR FRIENDS');
                }
                
                return React.createElement(
                    'button',
                    {
                        onClick: () => this.setState({liked: true})
                    },
                    'Like'
                );
            }
        }
    }
    
    //using react with jquery: load react component after page has finish load
    $(document).ready( function() {
        if (see_the_alert) {
            alert('THIS IS A TEST');
        }
        
        //const domContainer = document.getElementById("like_button_container");
        const domContainer = document.querySelector('#like_button_container'); //this is same like getElementById
        if (see_the_alert) {
            alert("Data inside : " + domContainer.dataset.remarks1);
        }
        
        //const domContainer = $("#like_button_container"); //but this will not work
        ReactDOM.render(React.createElement(LikeButtonz, { remarks2: domContainer.dataset.remarks1 }), domContainer);
        
        if (see_the_alert) {
            alert('SEE THE DIFFERENCES?');
        }
    });
</script>

<div>
    <h2>My sample page TEST 1</h2>
    <p>This is a normal web page content</p>
</div>
<hr/>

<div>
    <h2>Embed react between TEST1 and TEST2</h2>
    <div id="like_button_container" data-remarks1="and you cannot lie">SAMPLE TEXT</div>
</div>
<hr/>

<div>
    <h2>My sample page TEST 2</h2>
    <p>This is a normal web page content</p>
</div>
<hr/>
