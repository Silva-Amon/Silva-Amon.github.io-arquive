import React, {Component} from 'react';
import Table from './Table';
import Form from './Form';

class App extends Component{

  state = {
    characters: []
  //   characters:
  //   [
  //     {
  //       'name':'Charlie',
  //       'job':'Janitor'
  //     },
  //     {
  //       'name':'Mac',
  //       'job':'Janitor'
  //     },
  //     {
  //       'name':'Dee',
  //       'job': 'Aspiring actress'
  //     },
  //     {
  //       'name':'Dennis',
  //       'job':'Bartender'
  //     }
  //   ]
  };

  removeCharacter = index => {
    const { characters } = this.state; //it's a object property

    this.setState({
      characters: characters.filter((character, i) => {
        return i !== index;
      })
    });
  }

handleSubmit = character => {
  this.setState({characters: [...this.state.characters, character]});
}

  render(){
    const {characters} = this.state;
     // const characters = [
      // {
      //   'name':'Charlie',
      //   'job':'Janitor'
      // },
      // {
      //   'name':'Mac',
      //   'job':'Janitor'
      // },
      // {
      //   'name':'Dee',
      //   'job': 'Aspiring actress'
      // },
      // {
      //   'name':'Dennis',
      //   'job':'Bartender'
      // }

    // ];

    return(
      <div className="container">
        <Table
          characterData={characters}
          removeCharacter={this.removeCharacter}
         />
         <Form handleSubmit={this.handleSubmit} />
      </div>
      // <div className="container">
      //   <Table />
      // </div>

      // <div className="App">
      //   <h1>Hello, React!</h1>
      // </div>
    );
  }
}

export default App;
