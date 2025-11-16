import API from "../_api";

// GET ALL GENRES
export const getGenres = async () => {
  const { data } = await API.get("/genres");
  return data;
};

// CREATE GENRE
export const createGenre = async (payload) => {
  const { data } = await API.post("/genres", payload);
  return data;
};

// UPDATE GENRE
export const updateGenre = async (id, payload) => {
  const { data } = await API.put(`/genres/${id}`, payload);
  return data;
};

// DELETE GENRE
export const deleteGenre = async (id) => {
  const { data } = await API.delete(`/genres/${id}`);
  return data;
};
