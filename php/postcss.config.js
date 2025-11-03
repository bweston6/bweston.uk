module.exports = {
  plugins: [
    require('doiuse')({
      browsers: [
        'and_chr>= 142',
        'and_ff >= 140', // ESR
        'chrome >= 142',
        'firefox >= 140', // ESR
        'ios_saf >= 15.8.5', // iPhone SE 1
      ],
      onFeatureUsage: (usageInfo) => {
        console.log(usageInfo.message);
      }
    }),
  ],
}
