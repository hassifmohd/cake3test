<?php
echo $this->Html->script('https://unpkg.com/react@16/umd/react.development.js');
echo $this->Html->script('https://unpkg.com/react-dom@16/umd/react-dom.development.js');
echo $this->Html->script('https://unpkg.com/babel-standalone@6.15.0/babel.min.js');
?>

<table>
    <tr>
        <td style="width: 100px;">TUT1-1</td>
        <td><div id="tut1-1"></div></td>
    </tr>
    <tr>
        <td>TUT1-2</td>
        <td><div id="tut1-2"></div></td>
    </tr>
    <tr>
        <td>TUT1-3</td>
        <td><div id="tut1-3"></div></td>
    </tr>
</table>

<script type="text/babel">

    //=============== TUT1-1: Without context
    class App1 extends React.Component {
        render() {
            return <Toolbar1 theme="dark" />;
        }
    }

    function Toolbar1(props) {
        // The Toolbar component must take an extra "theme" prop
        // and pass it to the ThemedButton. This can become painful
        // if every single button in the app needs to know the theme
        // because it would have to be passed through all components.
        return (
            <div>
                <ThemedButton1 theme={props.theme} />
            </div>
        );
    }

    function ThemedButton1(props) {
        return <button theme={props.theme}>theme={props.theme}</button>;
    }

    ReactDOM.render(
        <App1/>,
        document.getElementById('tut1-1')
    );

    //=============== TUT1-2: Using context
    const ThemeContext = React.createContext('light');

    class App2 extends React.Component {
        render() {
            // Use a Provider to pass the current theme to the tree below.
            // Any component can read it, no matter how deep it is.
            // In this example, we're passing "dark" as the current value.
            return (
                <ThemeContext.Provider value="dark">
                    <Toolbar2 />
                </ThemeContext.Provider>
            );
        }
    }

    // A component in the middle doesn't have to
    // pass the theme down explicitly anymore.
    function Toolbar2(props) {
        return (
            <div>
                <ThemedButton2 />
            </div>
        );
    }

    function ThemedButton2(props) {
        // Use a Consumer to read the current theme context.
        // React will find the closest theme Provider above and use its value.
        // In this example, the current theme is "dark".
        return (
            <ThemeContext.Consumer>
                {theme => <button {...props} theme={theme}>theme={theme}</button>}
            </ThemeContext.Consumer>
        );
    }

    ReactDOM.render(
        <App2/>,
        document.getElementById('tut1-2')
    );

    //=============== TUT1-3 if we did not encapsulate with Provider, Consumer will take its default value
    class App3 extends React.Component {
        render() {
            return (
                <ThemeContext.Consumer>
                    {theme => <button theme={theme}>theme={theme}</button>}
                </ThemeContext.Consumer>
        );
        }
    }

    ReactDOM.render(
        <App3/>,
        document.getElementById('tut1-3')
    );

    //=============== TUT2-1
</script>