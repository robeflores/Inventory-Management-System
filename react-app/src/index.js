import ReactDOM from "react-dom";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import './index.css';

import NoPage from "./pages/NoPage";
import Home from "./pages/Home";
import Add from "./pages/Add";


export default function App() {
  return (
    <BrowserRouter>
      <Header />
      <main>
      <Routes>
          <Route path="*" element={<NoPage />} />
          <Route path="/" element={<Home />} />
          <Route path="/add" element={<Add />} />
      </Routes>
      <div className="push"></div>
      </main>
      <Footer />
    </BrowserRouter>
  );
}

ReactDOM.render(<App />, document.getElementById("root"));

function Header() {
    return(
        <nav className="navbar navbar-expand-md navbar-dark navbar-bg-custom sticky-top" style={{ marginBottom: '15px'}}>
            <Link className="navbar-brand" to="/">Inventory Management System</Link>
                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav mr-auto"></ul>
                </div>
        </nav>
    );
}

function Footer() {
    return(
        <footer>
            <div className="container">
                <p className="text-center">Inventory Management System</p>
            </div>
        </footer>
    );
}