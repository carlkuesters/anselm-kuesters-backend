module.exports = ({ env }) => ({
  auth: {
    secret: env('ADMIN_JWT_SECRET', '1921c46a1008a8117498b16259af67ca'),
  },
});
