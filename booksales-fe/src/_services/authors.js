import API from "../_api";

// GET ALL AUTHORS
export const getAuthors = async () => {
  const { data } = await API.get("/authors");
  return data;
};

// CREATE AUTHOR
export const createAuthor = async (payload) => {
  const { data } = await API.post("/authors", payload);
  return data;
};

// UPDATE AUTHOR
export const updateAuthor = async (id, payload) => {
  const { data } = await API.put(`/authors/${id}`, payload);
  return data;
};

// DELETE AUTHOR
export const deleteAuthor = async (id) => {
  const { data } = await API.delete(`/authors/${id}`);
  return data;
};
