import { BrowserRouter, Route, Routes } from "react-router-dom";

// Public pages
import Home from "./pages/public";
import Books from "./pages/public/books";

// Layouts
import PublicLayout from "./layouts/public";
import AdminLayout from "./layouts/admin";

// Auth pages
import Login from "./pages/auth/login";
import Register from "./pages/auth/register";

// Admin pages
import Dashboard from "./pages/admin";

// Admin — Books
import AdminBooks from "./pages/admin/books";
import CreateBook from "./pages/admin/books/create";

// Admin — Genres
import AdminGenres from "./pages/admin/genres";
import CreateGenre from "./pages/admin/genres/create";

// Admin — Authors
import AdminAuthors from "./pages/admin/authors";
import CreateAuthor from "./pages/admin/authors/create";

function App() {
  return (
    <BrowserRouter>
      <Routes>

        {/* PUBLIC */}
        <Route element={<PublicLayout />}>
          <Route index element={<Home />} />
          <Route path="books" element={<Books />} />
        </Route>

        {/* AUTH */}
        <Route path="login" element={<Login />} />
        <Route path="register" element={<Register />} />

        {/* ADMIN */}
        <Route path="admin" element={<AdminLayout />}>

          {/* Dashboard */}
          <Route index element={<Dashboard />} />

          {/* Books */}
          <Route path="books">
            <Route index element={<AdminBooks />} />
            <Route path="create" element={<CreateBook />} />
          </Route>

          {/* Genres */}
          <Route path="genres">
            <Route index element={<AdminGenres />} />
            <Route path="create" element={<CreateGenre />} />
          </Route>

          {/* Authors */}
          <Route path="authors">
            <Route index element={<AdminAuthors />} />
            <Route path="create" element={<CreateAuthor />} />
          </Route>

        </Route>

      </Routes>
    </BrowserRouter>
  );
}

export default App;
